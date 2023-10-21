<!DOCTYPE html>
<html>
<head>
<style>
   /* Styles de la bande d'actualités */
.breaking-news {
    background-color: red; /* Couleur de fond de la bande d'urgence */
    overflow: hidden;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
    margin-top: 5px;
    border solid 1 #868685;
    height: 50px;
    
}

.breaking-news-content {
    white-space: nowrap;
    animation: scroll 20s linear infinite; /* Animation de défilement */

}




.breaking-news-content p {
    display: inline-block;
    margin-right: 20px;
    font-size: 18px;
}

@keyframes scroll {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(-100%);
    }
}

.breaking-news:hover .breaking-news-content {
    animation-play-state: paused;
}



.link-headr{
    color: white;
}


.link-headr:hover{
    color: #115292;;
}






    </style>
</head>
<body>
<div class="breaking-news">
    <div class="breaking-news-content">
        <?php
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://bb-finance-bloomberg.p.rapidapi.com/quotes/search?query=FTSE 100 Index",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: bb-finance-bloomberg.p.rapidapi.com",
                "X-RapidAPI-Key: 70fdf8d1f7msh248a97e0a8b4e8ep148b0ejsn27486627d481" // Remplacez par votre clé API
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, true);
            if (isset($data['data']) && is_array($data['data'])) {
                foreach ($data['data'] as $financialData) {
                    echo '<a href="#" class="link-headr"><p>' . $financialData['name'] . '</p></a>';
                    echo '<a href="#" class="link-headr"><p>' . $financialData['score'] . '</p></a>';
                    if (isset($financialData['ticker_symbol'])) {
                        echo '<a href="#" class="link-headr"><p>' . $financialData['ticker_symbol'] . '</p></a>';
                    } else {
                        echo '<a href="#" class="link-headr"><p>Donnée non disponible</p></a>';
                    }
                }
            } else {
                echo "Aucune donnée financière disponible.";
            }
        }
        ?>
    </div>
</div>
</body>
</html>
