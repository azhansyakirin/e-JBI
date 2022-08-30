<!DOCTYPE HTML>

<html>
  <head>
    <link href="http://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />

    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background-color: #29255F;
      }
      i {
        color: #FF0000;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 100px;
        border-radius: 10px;
        display: inline-block;
        margin: 0 auto;
      }

      input[type=text] {
            width: 100%;
            font-family: 'Poppins', sans-serif;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 3px solid #ccc;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            outline: none;
            text-align: left;
            }

            input[type=text]:focus {
            border: 3px solid #555;
            }

            input[type=date] {
            width: 100%;
            font-family: Helvetica, sans-serif;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 3px solid #ccc;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            outline: none;
            text-align: left;
            }

            input[type=date]:focus {
            border: 3px solid #555;
            font-family: Helvetica, sans-serif;
            }

            input[type=button] {
                display: inline-block;
                padding: 0em 3em;
                background: #009E2D;
                letter-spacing: 0.20em;
                line-height: 4em;
                text-decoration: none;
                text-transform: uppercase;
                font-weight: 400;
                border-radius: 50px;
                font-size: 1em;
                color: #FFF;
                margin-top: 12px;
            }

            select[type=dropdown] {
            width: 100%;
            font-family: Helvetica, sans-serif;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 3px solid #ccc;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            outline: none;
            text-align: left;
            }

            select[type=dropdown]:focus {
            border: 3px solid #555;
            font-family: Helvetica, sans-serif;
            }

            .footer {
            position: sticky;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #333333;
            color: white;
            text-align: center;
            }

            .container {
            width : 90%;
            }
            
    </style>

    <script>
      function goBack() {
      window.history.back();
    }
    </script>
    
  </head>

<body>

    <div id="wrapper">

        <div id="header-wrapper">

            <div class="card" style="margin-left: auto; margin-right: auto; margin-top: 150px;">

                <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                    <i class="checkmark">✘</i>        
                </div>

                <h1>Gagal</h1> 
                <br>
                <p>Perdaftaran anda tidak berjaya direkodkan.<br> Sila cuba sebentar lagi.</p>

            </div>
            
            <br>
            <a onClick="goBack()" class="btn">Kembali</a>

        </div>


    </div>

</body>

</html>