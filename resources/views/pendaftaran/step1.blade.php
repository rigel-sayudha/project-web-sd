<!-- Step 1: Form Data Diri -->
<form action="{{ route('pendaftaran.store') }}?step=2" method="POST" class="space-y-8">
    @csrf
    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 hover-card fade-in">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
            <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            Biodata Siswa
        </h2>
        <div class="space-y-4">
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="tempat_tanggal_lahir">Tempat, Tanggal Lahir</label>
                <div class="flex flex-col md:flex-row md:space-x-4">
                    <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" class="w-full md:w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent mb-2 md:mb-0" required>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" class="w-full md:w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                </div>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="email">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="jenis_kelamin">Jenis Kelamin</label>
                <div class="flex space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="jenis_kelamin" value="L" class="form-radio text-blue-600" required>
                        <span class="ml-2">Laki-laki</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="jenis_kelamin" value="P" class="form-radio text-blue-600" required>
                        <span class="ml-2">Perempuan</span>
                    </label>
                </div>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="agama">Agama</label>
                <select id="agama" name="agama" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="no_telp">No. Telepon</label>
                <input type="tel" id="no_telp" name="no_telp" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="asal_sekolah">Asal Sekolah</label>
                <input type="text" id="asal_sekolah" name="asal_sekolah" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
            </div>
        </div>
    </div>

    <!-- Data Orang Tua Kandung -->
    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 hover-card fade-in">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
            <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h1l1 2h13l1-2h1M5 20h14a2 2 0 002-2v-5H3v5a2 2 0 002 2z"/>
            </svg>
            Data Orang Tua Kandung
        </h2>
        <div class="space-y-4">
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="nama_ayah">Nama Lengkap Ayah</label>
                <input type="text" id="nama_ayah" name="nama_ayah" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="nama_ibu">Nama Lengkap Ibu</label>
                <input type="text" id="nama_ibu" name="nama_ibu" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="alamat_ortu">Alamat Orang Tua</label>
                <textarea id="alamat_ortu" name="alamat_ortu" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent" required></textarea>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="telepon_ortu">Telepon Orang Tua</label>
                <input type="tel" id="telepon_ortu" name="telepon_ortu" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="pekerjaan_ayah">Pekerjaan Ayah</label>
                <select id="pekerjaan_ayah" name="pekerjaan_ayah" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent" required>
                    <option value="">Pilih Pekerjaan</option>
                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                    <option value="Wiraswasta">Wiraswasta</option>
                    <option value="Buruh">Buruh</option>
                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="pekerjaan_ibu">Pekerjaan Ibu</label>
                <select id="pekerjaan_ibu" name="pekerjaan_ibu" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent" required>
                    <option value="">Pilih Pekerjaan</option>
                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                    <option value="Wiraswasta">Wiraswasta</option>
                    <option value="Buruh">Buruh</option>
                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                    <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="pendapatan_ortu">Pendapatan Orang Tua (per bulan)</label>
                <select id="pendapatan_ortu" name="pendapatan_ortu" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent" required>
                    <option value="">Pilih Pendapatan</option>
                    <option value="<1.000.000">< 1.000.000</option>
                    <option value="1.000.000-1.999.999">1.000.000 - 1.999.999</option>
                    <option value="2.000.000-4.999.999">2.000.000 - 4.999.999</option>
                    <option value=">=5.000.000">>= 5.000.000</option>
                </select>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 hover-card fade-in">
        <label class="inline-flex items-center space-x-3 cursor-pointer">
            <input type="checkbox" id="memiliki_wali" name="memiliki_wali" class="form-checkbox text-purple-600" />
            <span class="text-gray-700 font-medium">Memiliki Wali?</span>
        </label>
    </div>

    <div id="form_wali" class="bg-white rounded-xl shadow-lg p-6 md:p-8 hover-card fade-in hidden">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
            <svg class="w-6 h-6 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.5a11.952 11.952 0 01-6.825-3.443 12.083 12.083 0 01.665-6.479L12 14z"/>
            </svg>
            Data Orang Tua Wali
        </h2>
        <div class="space-y-4">
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="nama_wali">Nama Lengkap</label>
                <input type="text" id="nama_wali" name="nama_wali" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="alamat_wali">Alamat</label>
                <textarea id="alamat_wali" name="alamat_wali" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent"></textarea>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="no_telp_wali">Nomor Telepon</label>
                <input type="tel" id="no_telp_wali" name="no_telp_wali" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="pekerjaan_wali">Pekerjaan Wali</label>
                <select id="pekerjaan_wali" name="pekerjaan_wali" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <option value="">Pilih Pekerjaan</option>
                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                    <option value="Wiraswasta">Wiraswasta</option>
                    <option value="Buruh">Buruh</option>
                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                    <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                </select>
            </div>
        </div>
    </div>

    <div class="flex justify-end space-x-4 fade-in">
        <button type="submit" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-300">
            Lanjut ke Jadwal Tes
        </button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkbox = document.getElementById('memiliki_wali');
        const formWali = document.getElementById('form_wali');

        function toggleFormWali() {
            if (checkbox.checked) {
                formWali.classList.remove('hidden');
            } else {
                formWali.classList.add('hidden');
            }
        }
        checkbox.addEventListener('change', toggleFormWali);
        toggleFormWali();

        const tanggalLahirInput = document.getElementById('tanggal_lahir');
        const tempatTanggalLahirDiv = tanggalLahirInput.closest('div');

        const usiaDiv = document.createElement('div');
        usiaDiv.classList.add('mt-2');
        usiaDiv.innerHTML = `
            <label for="usia" class="block text-gray-700 font-medium mb-2">Usia</label>
            <input type="text" id="usia" readonly disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed" placeholder="Usia akan muncul otomatis" />
        `;
        tempatTanggalLahirDiv.appendChild(usiaDiv);

        function hitungUsia(tanggalLahir) {
            const today = new Date();
            const birthDate = new Date(tanggalLahir);
            let age = today.getFullYear() - birthDate.getFullYear();
            const m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }

        tanggalLahirInput.addEventListener('change', function () {
            const tanggalLahir = this.value;
            if (tanggalLahir) {
                const usia = hitungUsia(tanggalLahir);
                document.getElementById('usia').value = usia >= 0 ? usia + ' tahun' : '';
            } else {
                document.getElementById('usia').value = '';
            }
        });
    });
</script>
