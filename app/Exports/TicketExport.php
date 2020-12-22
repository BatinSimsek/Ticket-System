<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class TicketExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ticket = request()->user()->ticket()->get();

        return $ticket;
    }

    // select function SQL
    public function map($ticket): array
    {
        return [
            $ticket->id,
            $ticket->title,
            $ticket->ticket,
        ];
    }


    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Ticket',
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        $styleArray = [
            'font' => [
                'bold' => true,
            ]
        ];

        return [
            // Handle by a closure.
            AfterSheet::class => function(AfterSheet $event) use ($styleArray){
                $event->sheet->getStyle('A1:H1')->applyFromArray($styleArray);
            },
        ];
    }
}
