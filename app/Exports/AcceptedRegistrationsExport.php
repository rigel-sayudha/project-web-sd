<?php

namespace App\Exports;

use App\Models\RegistrationPoint;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AcceptedRegistrationsExport implements FromCollection, WithHeadings, WithStyles, WithColumnFormatting
{
    public function collection()
    {
        return RegistrationPoint::with('registration')
            ->where('status_lolos', 1)
            ->orderBy('total_points', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'Nama Siswa' => $item->registration->nama ?? '-',
                    'Email' => $item->registration->email ?? '-',
                    'Total Poin' => $item->total_points,
                    'Skor Ujian' => $item->exam_score,
                    'Jumlah Sumbangan' => $item->donation_amount,
                    'Poin Sumbangan' => $item->donation_points,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Email',
            'Total Poin',
            'Skor Ujian',
            'Jumlah Sumbangan',
            'Poin Sumbangan',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Header style
        $sheet->getStyle('A1:F1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 12,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '2563EB', // Tailwind blue-600
                ],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);
        // Body border
        $highestRow = $sheet->getHighestRow();
        $sheet->getStyle('A1:F'.$highestRow)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        return [];
    }

    public function columnFormats(): array
    {
        return [
            'E' => '"Rp" #,##0', // Custom format for Rupiah
            'C' => NumberFormat::FORMAT_NUMBER,
            'D' => NumberFormat::FORMAT_NUMBER,
            'F' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}
