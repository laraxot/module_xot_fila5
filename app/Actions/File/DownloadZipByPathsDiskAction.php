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
<<<<<<< .merge_file_JvYM8A
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<int, string>  $attachments  Array di percorsi file
     * @param  string  $disk  Nome del disco di storage
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_GQOMcV
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<int, string>  $attachments  Array di percorsi file
     * @param  string  $disk  Nome del disco di storage
=======
     * @param array<int, string> $attachments Array di percorsi file
     * @param string             $disk        Nome del disco di storage
     *
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<int, string> $attachments Array di percorsi file
     * @param string             $disk        Nome del disco di storage
     *
>>>>>>> .merge_file_kjjx06
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string> $attachments Array di percorsi file
     * @param string        $disk        Nome del disco di storage
     *
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<int, string>  $attachments  Array di percorsi file
     * @param  string  $disk  Nome del disco di storage
>>>>>>> .merge_file_SEmIfB
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return BinaryFileResponse|null Risposta di download o null se fallisce
     */
    public function execute(array $attachments, string $disk): ?BinaryFileResponse
    {
        $zipFileName = 'temp_zip_'.uniqid().'.zip';
        $zipPath = 'temp/'.$zipFileName;

        // Crea un file temporaneo per lo ZIP usando Storage
<<<<<<< HEAD
<<<<<<< .merge_file_JvYM8A
<<<<<<< HEAD
<<<<<<< HEAD
        $zip = new \ZipArchive;
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_GQOMcV
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        $zip = new \ZipArchive;
=======
        $zip = new \ZipArchive();
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $zip = new \ZipArchive();
>>>>>>> .merge_file_kjjx06
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $zip = new \ZipArchive();
>>>>>>> 3792da0d (Check & fix styling)
=======
        $zip = new \ZipArchive;
>>>>>>> .merge_file_SEmIfB
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $tempFilePath = storage_path('app/'.$zipPath);

        // Assicurati che la directory temp esista
        Storage::disk('local')->makeDirectory('temp');

<<<<<<< HEAD
<<<<<<< .merge_file_JvYM8A
<<<<<<< HEAD
<<<<<<< HEAD
        if ($zip->open($tempFilePath, \ZipArchive::CREATE) === true) {
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_GQOMcV
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if ($zip->open($tempFilePath, \ZipArchive::CREATE) === true) {
=======
        if (true === $zip->open($tempFilePath, \ZipArchive::CREATE)) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if (true === $zip->open($tempFilePath, \ZipArchive::CREATE)) {
>>>>>>> .merge_file_kjjx06
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if (true === $zip->open($tempFilePath, \ZipArchive::CREATE)) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($zip->open($tempFilePath, \ZipArchive::CREATE) === true) {
>>>>>>> .merge_file_SEmIfB
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            foreach ($attachments as $attachment) {
                $filePath = $attachment;

                if (Storage::disk($disk)->exists($filePath)) {
                    $fileContent = Storage::disk($disk)->get($filePath);
<<<<<<< HEAD
<<<<<<< .merge_file_JvYM8A
<<<<<<< HEAD
<<<<<<< HEAD
                    if ($fileContent !== null) {
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_GQOMcV
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                    if ($fileContent !== null) {
=======
                    if (null !== $fileContent) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                    if (null !== $fileContent) {
>>>>>>> .merge_file_kjjx06
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                    if (null !== $fileContent) {
>>>>>>> 3792da0d (Check & fix styling)
=======
                    if ($fileContent !== null) {
>>>>>>> .merge_file_SEmIfB
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
