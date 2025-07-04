<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Selamat Datang - Sistem Inventory</title>
  <style>
    body {
			margin: 0;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			background: url('<?= base_url() ?>assets/inven3.jpg') no-repeat center center fixed;
			background-size: cover;
			display: flex;
			flex-direction: column;
			min-height: 100vh;
			color: #333;
		}


    .header {
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      color: white;
      padding: 70px 20px;
      text-align: center;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }

    .header h1 {
      margin: 0;
      font-size: 36px;
      font-weight: 700;
      letter-spacing: 1px;
    }

    .container {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
    }

    .box {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.1);
      max-width: 500px;
      width: 100%;
      text-align: center;
      transition: transform 0.3s ease;
    }

    .box:hover {
      transform: translateY(-3px);
    }

    .box p {
      margin-bottom: 25px;
      font-size: 17px;
      color: #555;
      line-height: 1.5;
    }

    .box a.btn {
      display: inline-block;
      padding: 12px 30px;
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-weight: 600;
      font-size: 16px;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .box a.btn:hover {
      background: linear-gradient(135deg, #2a5298, #1e3c72);
      transform: scale(1.05);
    }

    footer {
      text-align: center;
      padding: 20px;
      font-size: 14px;
      background-color: #eaeaea;
      color: #555;
      border-top: 1px solid #ddd;
    }

    footer a {
      text-decoration: none;
      color: #1e3c72;
      font-weight: 600;
    }

    footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
	
  <div class="header">
    <h1>Sistem Inventory Gudang</h1>
  </div>

  <div class="container">
    <div class="box">
      <p>Silahkan Login terlebih dahulu untuk memulai menikmati pelayanan dari SISTEM INVENTORY, sistem inventory ini menggunakan CI dan Mysql.</p>
      <a href="<?= base_url('auth') ?>" class="btn">Login</a>
    </div>
  </div>

  <footer>
    © 2024/2025 <a href="#">A11.2021.13694_Aditya Eka Pradana // A11.2021.13842_Pedro Bagas W</a>. All rights reserved.
  </footer>

</body>
</html>
