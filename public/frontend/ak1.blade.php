<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AK1</title>
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
            ddisplay: block;
            margin-bottom: 5px;
            border-spacing: 15px;
            border-radius: 8px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            outline: none;
            box-sizing: border-box;
            border-spacing: 15px;
            border-radius: 8px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            outline: none;
            box-sizing: border-box;
            border-spacing: 15px;
            border-radius: 8px;
        }

        .btn {
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1 class="header">Welcome to AK1</h1>

        <div class="section">
            <label for="Nama">Nama Lengkap:</label>
            <input type="text" id="Nama" name="Nama">

            <label for="Nama">NIK:</label>
            <input type="text" id="Nama" name="Nama">

            <label for="Email">Email:</label>
            <input type="text" id="Email" name="Email">

            <label for="No HP">No HP:</label>
            <input type="text" id="No HP" name="No Hp">

            <label for="TTL">Tempat Tanggal Lahir:</label>
            <input type="text" id="TTL" name="TTL">

            <label for="category">Jenis Kelamin:</label>
            <select id="category" name="category">
                <option value="">--Please choose an option--</option>
                <option value="Cowo">Laki-Laki</option>
                <option value="Cewe">Perempuan</option>
            </select>

            <label for="category">Pendidikan Terakhir:</label>
            <select id="category" name="category">
                <option value="">--Please choose an option--</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMK/SMA">SMK/SMA</option>
                <option value="kULIAH">S1,D3</option>
            </select>

            <label for="Alamat">Alamat:</label>
            <textarea id="Alamat" name="alamat"></textarea>

            <div class="column"> 
            <label for="filePasFoto">Upload Pas Foto :
            </label> <input type="file" id="filePasFoto" name="filePasFoto"> 
        </div>

        <div class="column"> 
            <label for="fileKtp">Upload Foto Ktp : </label> 
            <input type="file" id="fileKtp" name="fileKtp"> 
        </div>
            
        <div class="column"> 
            <label for="fileIjazah">Upload Foto Copy Ijazah :</label> 
            <input type="file" id="fileIjazah" name="fileIjazah"> 
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