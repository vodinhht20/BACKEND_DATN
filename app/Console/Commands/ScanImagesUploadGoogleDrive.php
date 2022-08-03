<?php

namespace App\Console\Commands;

use App\Models\Noti;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ScanImagesUploadGoogleDrive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:upload-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'upload images storage local to google drive';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Log::debug('Đã chạy '.date('Y-m-d H:i'));
        Noti::telegramLog('Schedule_upload', 'Đã chạy '.date('Y-m-d H:i'));
        // $imageStorage = Storage::get('public/avatars/'.'CM001_dsflsjljlfsjldfjfdjs_2022-06-11.png');
        $dataFake = [
            ['id' => 'CM001', 'status' => '0', 'image' => 'CM001_dsflsjljlfsjldfjfdjs_2022-06-11.png'],
            ['id' => 'CM002', 'status' => '1', 'image' => 'CM002_fdjfkdkjf_2022-06-15.png'],
            ['id' => 'CM003', 'status' => '0', 'image' => 'CM003_dsflsjljlfsjldfjfdjs_2022-06-11.png'],
        ];

        $imageStorage = Storage::disk('public')->allFiles('documents');
        if ($imageStorage) {
            foreach ($imageStorage as $path) {
                $file = pathinfo($path);
                $basename = explode('_', $file['basename']);
                foreach ($dataFake as $value) {
                    if ($basename['0'] == $value['id'] && $value['status'] == 0) {
                        \Log::debug('Upload tự động thành công'.date('Y-m-d H:i'));
                        Noti::telegramLog('Schedule_upload', 'Upload tự động thành công '.date('Y-m-d H:i'));
                        Storage::disk('google')->put($value['image'], Storage::get('public/'.$path));
                        unlink(storage_path('app/public/'.$path));
                    }
                }
            }
        }
    }
}
