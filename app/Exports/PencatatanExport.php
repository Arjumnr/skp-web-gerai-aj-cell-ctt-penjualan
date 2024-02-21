<?php

namespace App\Exports;

use App\Models\Pencatatan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment as StyleAlignment;


class PencatatanExport implements FromCollection,WithHeadings, WithMapping,WithStyles,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $startDatePareseCarbon;
    protected $endDatePareseCarbon;


    public function __construct($startDatePareseCarbon, $endDatePareseCarbon )
    {
        $this->startDatePareseCarbon = $startDatePareseCarbon;
        $this->endDatePareseCarbon = $endDatePareseCarbon;

    }
    public function collection()
    {
        // $data = $this->datas;
        return $data = Pencatatan::with('get_barang', 'get_user')
        ->whereBetween('created_at', [
            $this->startDatePareseCarbon->format('Y-m-d').' 00:00:00',
            $this->endDatePareseCarbon->format('Y-m-d').' 23:59:59',
        ])->get();
    }

    public function headings(): array
    {
    //   
        return [
            'NO',  // Replace with actual column names
            'TANGGAL',  // Replace with actual column names
            'NAMA PEMBELI',  // Replace with actual column names
            'BARANG',  // Replace with actual column names
            'JENIS',  // Replace with actual column names
            'JUMLAH',  // Replace with actual column names
            'HARGA',  // Replace with actual column names
            'HARGA JUAL',  // Replace with actual column names
            'TOTAL PEMBAYARAN',
            
        ];
    }

    public function map($data): array
    {
        static $no = 1;
        return [
            //no
            $no++ ?? '',
            date('d-m-Y', strtotime($data->created_at)) ?? '',
            $data->get_user->name  ?? '',
            $data->get_barang->nama_barang  ?? '',
            $data->get_barang->kategori  ?? '',
            $data->jumlah ?? '',
            $data->get_barang->modal ?? '',
            $data->total ?? '',
            $data->total ?? '',
            
          
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:J1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);

        // Auto-size columns
        foreach (range('A', 'J') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:J1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                ]);
                $event->sheet->getDelegate()->getStyle('A1:J1')->getAlignment()->setHorizontal(StyleAlignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('A:I')->getAlignment()->setHorizontal(StyleAlignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('H:I')->getAlignment()->setVertical(StyleAlignment::VERTICAL_CENTER);
            }                
        ];
    }
}
