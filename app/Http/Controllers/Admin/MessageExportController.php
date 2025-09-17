<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class MessageExportController
{
    public function export($format)
    {
        $messages = DB::table('messages')->get();
        if ($format === 'excel') {
            $csv = "Contact,Sujet,Date,Statut\n";
            foreach ($messages as $msg) {
                $csv .= "{$msg->contact},{$msg->subject},{$msg->created_at}," . ($msg->is_read ? 'Lu' : 'Non lu') . "\n";
            }
            return Response::make($csv, 200, [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename=messages.csv',
            ]);
        } elseif ($format === 'pdf') {
            $pdf = "Messages:\n\n";
            foreach ($messages as $msg) {
                $pdf .= "Contact: {$msg->contact}\nSujet: {$msg->subject}\nDate: {$msg->created_at}\nStatut: " . ($msg->is_read ? 'Lu' : 'Non lu') . "\n---\n";
            }
            return Response::make($pdf, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename=messages.pdf',
            ]);
        }
        return back()->with('error', 'Format non supporté');
    }
}

