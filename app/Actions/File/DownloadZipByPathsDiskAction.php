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
<<<<<<< .merge_file_GQOMcV
<<<<<<< HEAD
     * @param  array<int, string>  $attachments  Array di percorsi file
     * @param  string  $disk  Nome del disco di storage
=======
     * @param array<int, string> $attachments Array di percorsi file
     * @param string             $disk        Nome del disco di storage
     *
>>>>>>> laraxot/dev
=======
     * @param array<int, string> $attachments Array di percorsi file
     * @param string             $disk        Nome del disco di storage
     *
>>>>>>> .merge_file_kjjx06
     * @return BinaryFileResponse|null Risposta di download o null se fallisce
     */
    public function execute(array $attachments, string $disk): ?BinaryFileResponse
    {
        $zipFileName = 'temp_zip_'.uniqid().'.zip';
        $zipPath = 'temp/'.$zipFileName;

        // Crea un file temporaneo per lo ZIP usando Storage
<<<<<<< .merge_file_GQOMcV
<<<<<<< HEAD
        $zip = new \ZipArchive;
=======
        $zip = new \ZipArchive();
>>>>>>> laraxot/dev
=======
        $zip = new \ZipArchive();
>>>>>>> .merge_file_kjjx06
        $tempFilePath = storage_path('app/'.$zipPath);

        // Assicurati che la directory temp esista
        Storage::disk('local')->makeDirectory('temp');

<<<<<<< .merge_file_GQOMcV
<<<<<<< HEAD
        if ($zip->open($tempFilePath, \ZipArchive::CREATE) === true) {
=======
        if (true === $zip->open($tempFilePath, \ZipArchive::CREATE)) {
>>>>>>> laraxot/dev
=======
        if (true === $zip->open($tempFilePath, \ZipArchive::CREATE)) {
>>>>>>> .merge_file_kjjx06
            foreach ($attachments as $attachment) {
                $filePath = $attachment;

                if (Storage::disk($disk)->exists($filePath)) {
                    $fileContent = Storage::disk($disk)->get($filePath);
<<<<<<< .merge_file_GQOMcV
<<<<<<< HEAD
                    if ($fileContent !== null) {
=======
                    if (null !== $fileContent) {
>>>>>>> laraxot/dev
=======
                    if (null !== $fileContent) {
>>>>>>> .merge_file_kjjx06
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
