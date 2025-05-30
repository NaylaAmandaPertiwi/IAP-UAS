<?php
function get_CURL ($url) 
{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);
  
  return json_decode($result, true);  
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UC8GvIZcEZk1FkFn06X2SKGQ&key=AIzaSyCNGjBi5BxUlAbVaR5H4F27CQrUIjwfaj8');

$youtubeProfilePic = $result ['items'] [0]  ['snippet'] ['thumbnails'] ['medium'] ['url'];
$channelName = $result ['items'] [0]  ['snippet'] ['title'];
$subscriber = $result ['items'] [0]  ['statistics'] ['subscriberCount'];

//latest video
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyCNGjBi5BxUlAbVaR5H4F27CQrUIjwfaj8&channelId=UC8GvIZcEZk1FkFn06X2SKGQ&maxResults=1&order=date&part=snippet';
$result = get_CURL($urlLatestVideo);

$latestVideoId = $result['items'][0]['id']['videoId']; 

$accessToken = 'IGAAZAYO0gZBqZBdBZAE9oNEMyaDRObjQtZAW5qcWFfbDNkWkNDa1c3aENtZAWQySXItZAEd3VTZADbkhHdWdnQXNYVUpQVWxxOTlGOTJYTmQ1eElrSjZAERlRaRVRJUWVYNXFfdGxCVTBnaUNoNXZAYM3Yxa1BXTGhUVHFNWG9ES2NCWUh5SQZDZD';

$result = get_CURL('https://graph.instagram.com/v22.0/me?fields=username,profile_picture_url,followers_count&access_token=IGAAZAYO0gZBqZBdBZAE9oNEMyaDRObjQtZAW5qcWFfbDNkWkNDa1c3aENtZAWQySXItZAEd3VTZADbkhHdWdnQXNYVUpQVWxxOTlGOTJYTmQ1eElrSjZAERlRaRVRJUWVYNXFfdGxCVTBnaUNoNXZAYM3Yxa1BXTGhUVHFNWG9ES2NCWUh5SQZDZD');
$usernameIG = $result['username'];
$profilePictureIG = $result['profile_picture_url'];
$followersIG = $result['followers_count'];

$result = get_CURL('https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,timestamp&access_token=IGAAZAYO0gZBqZBdBZAE9oNEMyaDRObjQtZAW5qcWFfbDNkWkNDa1c3aENtZAWQySXItZAEd3VTZADbkhHdWdnQXNYVUpQVWxxOTlGOTJYTmQ1eElrSjZAERlRaRVRJUWVYNXFfdGxCVTBnaUNoNXZAYM3Yxa1BXTGhUVHFNWG9ES2NCWUh5SQZDZD');
$photos = [];
foreach ($result['data'] as $photo) {
    $photos[] = $photo['media_url'];
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>My Portfolio</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">Nayla Amanda Pertiwi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Portfolio</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="img/profil3.jpg" class="rounded-circle img-thumbnail">
          <h1 class="display-4">Nayla Amanda Pertiwi</h1>
          <h3 class="lead">Student | Influencer | Businesswoman</h3>
        </div>
      </div>
    </div>


    <!-- About -->
    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <p>Saya adalah Nayla Amanda Pertiwi, seorang mahasiswa jurusan Sistem Informasi yang memiliki ketertarikan besar pada teknologi dan pengembangan digital. Di bangku kuliah, saya aktif mengikuti berbagai kegiatan akademik dan berusaha mengasah keterampilan di bidang analisis sistem, pemrograman, serta manajemen data. Saya percaya bahwa dunia digital memiliki potensi luar biasa untuk masa depan, dan itulah yang mendorong saya untuk terus belajar dan berkembang di bidang ini.</p>
          </div>
          <div class="col-md-5">
            <p>Selain sebagai mahasiswa, saya juga dikenal sebagai seorang Tiktokers dan pebisnis muda. Saya memanfaatkan platform media sosial untuk berbagi konten inspiratif, kreatif, dan membangun personal branding. Di sisi lain, saya juga menjalankan usaha sendiri, yang menantang saya untuk berpikir strategis, inovatif, dan bertanggung jawab. Bagi saya, menjadi seorang konten kreator sekaligus pebisnis bukan hanya tentang popularitas atau keuntungan, tetapi juga tentang memberikan nilai dan dampak positif bagi banyak orang</p>
          </div>
        </div>
      </div>
    </section>


<section class="social bg-light" id="social">
  <div class="container">
    
    <!-- Judul -->
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>Social Media</h2>
      </div>
    </div>

    <!-- Konten Utama: YouTube dan Instagram -->
    <div class="row justify-content-center">
      
      <!-- YouTube -->
      <div class="col-md-5 mb-4">
        <div class="row mb-3">
          <div class="col-md-4 text-center">
            <img src="<?= $youtubeProfilePic; ?>" width="100" class="rounded-circle img-thumbnail" alt="YouTube Profile Picture">
          </div>
          <div class="col-md-8 d-flex flex-column justify-content-center">
            <h5><?= $channelName; ?></h5>
            <p><?= $subscriber; ?> Subscribers</p>
            <div class="g-ytsubscribe" 
                 data-channelid="UCpBSzHBGmk49b4IoCtoLdqw" 
                 data-layout="default" 
                 data-count="default"></div>
          </div>
        </div>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" 
                  src="https://www.youtube.com/embed/<?= $latestVideoId ?>?rel=0" 
                  allowfullscreen></iframe>
        </div>
      </div>

      <!-- Instagram -->
      <div class="col-md-5 mb-4">
        <div class="row mb-3">
          <div class="col-md-4 text-center">
            <img src="<?= $profilePictureIG; ?>" width="100" class="rounded-circle img-thumbnail" alt="Instagram Profile Picture">
          </div>
          <div class="col-md-8 d-flex flex-column justify-content-center">
            <h5><?= $usernameIG; ?></h5>
            <p><?= $followersIG; ?> Followers</p>
          </div>
        </div>
        <div class="row mt-3 pb-3">
        <div class="col d-flex flex-wrap gap-2">
          <?php foreach ($photos as $photo) : ?>
            <div class="ig-thumbnail" style="width: 100px; height: 100px; overflow: hidden; border-radius: 10px;">
              <img src="<?= $photo; ?>" class="img-fluid" alt="Instagram Photo" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      </div>

    </div>
  </div>
</section>



    <!-- Portfolio -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Portfolio</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/1.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/2.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/3.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>   
        </div>

        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/4.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div> 
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/5.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/6.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Contact -->
    <section class="contact bg-light" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Me</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Location</h3></li>
              <li class="list-group-item">My Office</li>
              <li class="list-group-item">Jl. Setiabudhi No. 193, Bandung</li>
              <li class="list-group-item">West Java, Indonesia</li>
            </ul>
          </div>

          <div class="col-lg-6">
            
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Send Message</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>


    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; 2018.</p>
          </div>
        </div>
      </div>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
  </body>
</html>