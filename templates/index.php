<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <title>SlimJim Blog</title>
        <link rel="stylesheet" type="text/css" href="../assets/styles.css">
    </head>
        <body>
            <header>
               <h1> The SlimJim Blog </h1> 
            </header>
            <h1>Welcome to my Proof of Concept Blog</h1>
            <p>
                This is a Slim powered blog that is being used a proof of concept, don't replace wordpress with it.
            </p>
            <?php
                foreach ($this->data['articles'] as $post){
                    echo '<section id='. $post['id'] . '>';
                    echo '<h2>' . $post['title'] . '</h1>';
                    echo '<p>' . $post['article'] . '</p>';
                    echo '<p>' . $post['author'] . '</p>';
                    echo '</section>';
                }
            ?>
           
        </body>
        
    </html>