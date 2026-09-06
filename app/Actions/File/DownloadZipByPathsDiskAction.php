<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\File;

use Illuminate\Support\Facades\Storage;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DownloadZipByPathsDiskAction
{
    use QueueableAction;

    /**
     * Crea un file ZIP dai percorsi forniti e lo restituisce come download.
     *
<<<<<<< HEAD
     * @param  array<int, string>  $attachments  Array di percorsi file
     * @param  string  $disk  Nome del disco di storage
=======
     * @param array<int, string> $attachments Array di percorsi file
     * @param string             $disk        Nome del disco di storage
     *
>>>>>>> 7f6cf6be (.)
     * @return BinaryFileResponse|null Risposta di download o null se fallisce
     */
    public function execute(array $attachments, string $disk): ?BinaryFileResponse
    {
        $zipFileName = 'temp_zip_'.uniqid().'.zip';
        $zipPath = 'temp/'.$zipFileName;

        // Crea un file temporaneo per lo ZIP usando Storage
<<<<<<< HEAD
        $zip = new \ZipArchive;
=======
        $zip = new \ZipArchive();
>>>>>>> 7f6cf6be (.)
        $tempFilePath = storage_path('app/'.$zipPath);

        // Assicurati che la directory temp esista
        Storage::disk('local')->makeDirectory('temp');

<<<<<<< HEAD
        if ($zip->open($tempFilePath, \ZipArchive::CREATE) === true) {
=======
        if (true === $zip->open($tempFilePath, \ZipArchive::CREATE)) {
>>>>>>> 7f6cf6be (.)
            foreach ($attachments as $attachment) {
                $filePath = $attachment;

                if (Storage::disk($disk)->exists($filePath)) {
                    $fileContent = Storage::disk($disk)->get($filePath);
<<<<<<< HEAD
                    if ($fileContent !== null) {
=======
                    if (null !== $fileContent) {
>>>>>>> 7f6cf6be (.)
                        $zip->addFromString($attachment.'.pdf', $fileContent);
                    }
                } else {
                    dddx(['filePath' => $filePath]);
                }
            }
            $zip->close();

            $downloadFileName = 'attachments_'.uniqid().'.zip';

            // Usa response()->download() per il download
            return response()->download($tempFilePath, $downloadFileName, [
                'Content-Type' => 'application/zip',
            ]); // ->deleteFileAfterSend(true);
        }

        return null;
    }
}
