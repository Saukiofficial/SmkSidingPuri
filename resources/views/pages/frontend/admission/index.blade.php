@extends('layouts.frontend')

@section('title', 'Pendaftaran Peserta Didik Baru')

@push('styles')
<style>
    .form-container-ppdb {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .header-ppdb {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
        padding: 40px;
        text-align: center;
    }
    .progress-bar {
        background: #f0f0f0;
        height: 6px;
        border-radius: 3px;
        margin-bottom: 40px;
        overflow: hidden;
    }
    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #4facfe, #00f2fe);
        width: 0%;
        transition: width 0.5s ease;
        border-radius: 3px;
    }
    .section-title {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #4facfe;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .btn-submit-ppdb {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
        padding: 15px 40px;
        border: none;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 10px 20px rgba(79, 172, 254, 0.3);
    }
    .btn-submit-ppdb:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(79, 172, 254, 0.4);
    }
    .required::after {
        content: ' *';
        color: #e74c3c;
    }
    .file-upload {
        border: 2px dashed #4facfe;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        background: rgba(79, 172, 254, 0.05);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .file-upload:hover {
        background: rgba(79, 172, 254, 0.1);
        border-color: #00f2fe;
    }
    .photo-preview {
        width: 150px;
        height: 150px;
        border: 3px dashed #4facfe;
        border-radius: 10px;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(79, 172, 254, 0.05);
        overflow: hidden;
    }
    .photo-placeholder {
        color: #4facfe;
        font-size: 3rem;
    }
</style>
@endpush

@section('content')
<div class="bg-gradient-to-br from-indigo-600 to-purple-700 py-16">
    <div class="container mx-auto px-6">
        <div class="form-container-ppdb max-w-4xl mx-auto">
            <div class="header-ppdb">
                <h1 class="text-4xl font-bold">📚 Form Pendaftaran Sekolah</h1>
                <p class="mt-2 text-lg">Lengkapi data dengan benar dan upload semua berkas yang diperlukan.</p>
            </div>

            <div class="p-8 md:p-10">
                <div class="progress-bar">
                    <div class="progress-fill" id="progressFill"></div>
                </div>

                <form id="registrationForm" action="{{ route('admission.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- Notifikasi --}}
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                            <strong class="font-bold">Pendaftaran Berhasil!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                            <strong class="font-bold">Terjadi Kesalahan!</strong>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Data Pribadi Siswa -->
                    <div class="mb-8">
                        <h2 class="section-title"><span class="text-2xl">👤</span> Data Pribadi Siswa</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <label for="full_name" class="block font-medium text-gray-700 mb-1 required">Nama Lengkap</label>
                                <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg" required>
                            </div>
                            <div>
                                <label for="nisn" class="block font-medium text-gray-700 mb-1">NISN</label>
                                <input type="text" name="nisn" id="nisn" value="{{ old('nisn') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg">
                            </div>
                            <div>
                                <label for="birth_place" class="block font-medium text-gray-700 mb-1 required">Tempat Lahir</label>
                                <input type="text" name="birth_place" id="birth_place" value="{{ old('birth_place') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg" required>
                            </div>
                            <div>
                                <label for="birth_date" class="block font-medium text-gray-700 mb-1 required">Tanggal Lahir</label>
                                <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg" required>
                            </div>
                            <div>
                                <label for="gender" class="block font-medium text-gray-700 mb-1 required">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="w-full px-4 py-2 border border-slate-300 rounded-lg" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="male" @if(old('gender') == 'male') selected @endif>Laki-laki</option>
                                    <option value="female" @if(old('gender') == 'female') selected @endif>Perempuan</option>
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label for="previous_school" class="block font-medium text-gray-700 mb-1 required">Asal Sekolah (SMP/MTs)</label>
                                <input type="text" name="previous_school" id="previous_school" value="{{ old('previous_school') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg" required>
                            </div>
                            <div class="md:col-span-2">
                                <label for="address" class="block font-medium text-gray-700 mb-1 required">Alamat Lengkap</label>
                                <textarea name="address" id="address" rows="3" class="w-full px-4 py-2 border border-slate-300 rounded-lg" required>{{ old('address') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Data Orang Tua -->
                    <div class="mb-8">
                        <h2 class="section-title"><span class="text-2xl">👨‍👩‍👧</span> Data Orang Tua / Wali</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <label for="father_name" class="block font-medium text-gray-700 mb-1 required">Nama Ayah</label>
                                <input type="text" name="father_name" id="father_name" value="{{ old('father_name') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg" required>
                            </div>
                            <div>
                                <label for="mother_name" class="block font-medium text-gray-700 mb-1 required">Nama Ibu</label>
                                <input type="text" name="mother_name" id="mother_name" value="{{ old('mother_name') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg" required>
                            </div>
                        </div>
                    </div>

                    <!-- Foto dan Upload Berkas -->
                    <div class="mb-8">
    <h2 class="section-title"><span class="text-2xl">📸</span> Foto dan Upload Berkas</h2>
    <div class="text-center mb-6">
        <label class="block font-medium text-gray-700 mb-2 required">Foto Siswa</label>
        <div class="photo-preview" id="photoPreview">
            <div class="photo-placeholder">📷</div>
        </div>
        <input type="file" id="photo" name="photo" accept="image/*" class="hidden" required>
        <button type="button" onclick="document.getElementById('photo').click()" class="bg-indigo-500 text-white text-sm font-semibold py-2 px-4 rounded-lg hover:bg-indigo-600">Pilih Foto</button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
        <div>
            <label class="block font-medium text-gray-700 mb-1 required">Akta Kelahiran</label>
            <input type="file" name="document_birth_certificate" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
        </div>
        <div>
            <label class="block font-medium text-gray-700 mb-1 required">Kartu Keluarga</label>
            <input type="file" name="document_family_card" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
        </div>
            <div>
            <label class="block font-medium text-gray-700 mb-1 required">Ijazah/SKHUN</label>
            <input type="file" name="document_ijazah" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
        </div>
            <div>
            <label class="block font-medium text-gray-700 mb-1 required">Raport Semester Terakhir</label>
            <input type="file" name="document_raport" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
        </div>
    </div>
</div>

                    <!-- Persetujuan -->
                     <div class="mb-8">
                        <div class="flex items-start">
                            <input type="checkbox" id="agreement" name="agreement" class="h-4 w-4 text-indigo-600 border-gray-300 rounded mt-1" required>
                            <label for="agreement" class="ml-2 block text-sm text-gray-700 required">
                                Saya menyatakan bahwa semua data yang saya isi adalah benar dan dapat dipertanggungjawabkan. Saya bersedia menerima konsekuensi apabila dikemudian hari ditemukan ketidaksesuaian data.
                            </label>
                        </div>
                    </div>

                    <div class="text-center mt-10">
                        <button type="submit" class="btn-submit-ppdb">
                            Daftar Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Photo upload handler
        const photoInput = document.getElementById('photo');
        if (photoInput) {
            photoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('photoPreview').innerHTML =
                            `<img src="${e.target.result}" alt="Photo Preview" class="w-full h-full object-cover">`;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Progress bar animation
        function updateProgress() {
            const form = document.getElementById('registrationForm');
            const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
            const filled = Array.from(inputs).filter(input => {
                if (input.type === 'checkbox') return input.checked;
                return input.value.trim() !== '';
            }).length;

            const progress = (inputs.length > 0) ? (filled / inputs.length) * 100 : 0;

            const progressFill = document.getElementById('progressFill');
            if(progressFill) {
                progressFill.style.width = progress + '%';
            }
        }

        document.querySelectorAll('#registrationForm input, #registrationForm select, #registrationForm textarea').forEach(element => {
            element.addEventListener('input', updateProgress);
            element.addEventListener('change', updateProgress);
        });

        updateProgress();
    });
</script>
@endpush
