<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal Test Siswa Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    @include('partial.navbar')
    <div class="min-h-screen py-12 px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Soal Test Siswa Baru</h1>
                
                <form action="{{ route('pendaftaran.store') }}?step=3" method="POST" class="space-y-8">
                    @csrf
                    
                    @foreach($questions as $index => $question)
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <p class="text-lg font-semibold text-gray-800 mb-4">{{ $index + 1 }}. {{ $question->question }}</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <label class="flex items-center p-4 bg-white rounded-lg hover:bg-blue-50 transition cursor-pointer">
                                <input type="radio" name="answers[{{ $question->id }}]" value="A" class="form-radio text-blue-600" required>
                                <span class="ml-2">A. {{ $question->option_a }}</span>
                            </label>
                            
                            <label class="flex items-center p-4 bg-white rounded-lg hover:bg-blue-50 transition cursor-pointer">
                                <input type="radio" name="answers[{{ $question->id }}]" value="B" class="form-radio text-blue-600" required>
                                <span class="ml-2">B. {{ $question->option_b }}</span>
                            </label>
                            
                            <label class="flex items-center p-4 bg-white rounded-lg hover:bg-blue-50 transition cursor-pointer">
                                <input type="radio" name="answers[{{ $question->id }}]" value="C" class="form-radio text-blue-600" required>
                                <span class="ml-2">C. {{ $question->option_c }}</span>
                            </label>
                            
                            <label class="flex items-center p-4 bg-white rounded-lg hover:bg-blue-50 transition cursor-pointer">
                                <input type="radio" name="answers[{{ $question->id }}]" value="D" class="form-radio text-blue-600" required>
                                <span class="ml-2">D. {{ $question->option_d }}</span>
                            </label>
                        </div>
                    </div>
                    @endforeach

                    <div class="flex justify-between pt-6">
                        <a href="{{ route('pendaftaran') }}?step=1" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition">
                            Kembali
                        </a>
                        <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                            Lanjut ke Sumbangan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
