<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ArticleImageUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_image_upload_path()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('test.jpg');
        
        $response = $this->post('/admin/articles', [
            'judul' => 'Test Article',
            'konten' => 'Test Content',
            'gambar' => $file,
            'status' => 'published'
        ]);

        Storage::disk('public')->assertExists('articles/' . $file->hashName());
        
        // Output the full path for debugging
        $fullPath = Storage::disk('public')->path('articles/' . $file->hashName());
        echo "Image should be at: " . $fullPath . "\n";
        echo "Public URL would be: " . asset('storage/articles/' . $file->hashName()) . "\n";
    }
}
