<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan KTKA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .row { 
            display: flex; justify-content: space-between; 
        }

        .column { 
            width: 33%; padding: 10px; 
        }

        .upload { 
            background-color: #4CAF50; 
            color: white; 
            padding: 10px; 
            border: none; 
            cursor: pointer; 
            width: 100%; 
            font-size: 15px; 
        }

        .upload:hover { 
            background-color: #45a049; 
        }

        .header {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .section {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        textarea {
            width: 100%;
            padding: 5px;
            resize: none;
        }

        .btn {
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1 class="header">Welcome to LKTKA</h1>

        <div class="section">
            <label for="Nama">Nama Lengkap:</label>
            <input type="text" id="Nama" name="Nama">

        <div class="column"> 
            <label for="filePasFoto">Upload Pas Foto :
            </label> <input type="file" id="filePasFoto" name="filePasFoto"> 
        </div>

        <div class="column"> 
            <label for="fileRPTK">Upload Pengesahan RPTK :
            </label> <input type="file" id="fileRPTK" name="filePasRPTK"> 
        </div>

        <div class="column"> 
            <label for="fileptka">Upload Pasport TKA : </label> 
            <input type="file" id="filePasport" name="filePasport"> 
        </div>
            
        <div class="column"> 
            <label for="filehasilpenilaian">Upload Hasil Penilaian :</label> 
            <input type="file" id="fileHasilPenilaian" name="fileHasilPenilaian"> 
        </div>

        <div class="column"> 
            <label for="fileizintinggalterbatas">Upload Kartu Izin Tinggal Terbatas :
            </label> <input type="file" id="fileKITAS" name="fileKITAS"> 
        </div>

        <div class="column"> 
            <label for="filecatatankepolisian">Upload Catatan Dari Kepolisian :
            </label> <input type="file" id="fileCatatanKepolisian" name="fileCatatanKepolisian"> 
        </div>

        <div class="column"> 
            <label for="fileSuratTKI">Upload Surat Permohonan TKI :
            </label> <input type="file" id="filePermohonanTKI" name="filePermohonanTKI"> 
        </div>

        
        <div class="column"> 
            <label for="fileKTPTKI">Upload KTP TKI Pendamping :
            </label> <input type="file" id="fileKTP TKI Pendamping" name="fileKTP TKI Pendamping"> 
        </div>

            <a href="#" class="button">Upload</a>
            
            <a href="#" class="button">Cetak Kartu</a>
        </div>
    </div>

    <script>
        document.getElementById('file').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file.type !== 'application/pdf') {
        alert('Please select a PDF file.');
        return;
    }

    // ... Implement your backend logic here to handle the uploaded file ...
});
    </script>
</body>
</html>