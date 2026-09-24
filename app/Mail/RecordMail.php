<?php

declare(strict_types=1);

namespace Modules\Xot\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class RecordMail.
 *
 * Mailable per l'invio di dati di record via email.
 */
class RecordMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * @var array<string, mixed>
     */
    public array $recordData;

    /**
     * Crea una nuova istanza del mailable.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $data  I dati del record
=======
     * @param array<string, mixed> $data I dati del record
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $data I dati del record
>>>>>>> 3792da0d (Check & fix styling)
     */
    public function __construct(array $data)
    {
        $this->recordData = $data;
    }

    /**
     * Costruisce il messaggio.
     *
     * @return $this
     */
    public function build(): self
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
        /* @phpstan-ignore argument.type (view-string not resolved for module views) */
>>>>>>> laraxot/dev
=======
        /* @phpstan-ignore argument.type (view-string not resolved for module views) */
>>>>>>> 3792da0d (Check & fix styling)
        return $this->view('xot::emails.record')->with(['data' => $this->recordData]);
    }
}
