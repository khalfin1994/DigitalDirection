<?php

namespace App\Actions\v1\Media;

use Exception;
use FFMpeg\FFMpeg;
use FFMpeg\Format\Audio\Mp3;
use Illuminate\Support\Facades\Storage;

class AudioFileCompressionAction
{
    /**
     * @throws Exception
     */
    public function compress($audioPath): string
    {
        $inputFile = Storage::disk('local')->path($audioPath);

        if (!file_exists($inputFile)) {
            throw new Exception("File not found: " . $inputFile);
        }

        $compressedDir = storage_path('app/public/files/compressed');
        if (!file_exists($compressedDir)) {
            mkdir($compressedDir, 0777, true);
        }

        $outputFile = $compressedDir . '/' . basename($audioPath);

        $ffmpeg = FFMpeg::create();
        $audio = $ffmpeg->open($inputFile);

        $format = new Mp3();
        $format->setAudioCodec('libmp3lame');
        $format->setAudioKiloBitrate(128);

        $audio->save($format, $outputFile);

        return $outputFile;
    }
}
