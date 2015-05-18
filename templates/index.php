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
            
            <section id="new_post">
                <button id="new_post" class="toggle">New Post</button>
                <form class="hidden" id="add_post">
                    <input type="text" name="title" value="New Title"><br>
                    <textarea name="post" rows=10 cols=30>New Post</textarea><br>
                    <input type="submit" value="Post" />
                </form>
            </section>
            
            <section id="posts">
            
            <?php
                foreach ($this->data['articles'] as $post){
                    echo '<article id='. $post['id'] . '>';
                    echo '<h2>' . $post['title'] . '</h1>';
                    echo '<p>' . $post['article'] . '</p>';
                    echo '<button class=delete>Delete</button>';
                    echo '<button class="toggle edit">Edit</button>';
                    echo '<form id=' . $post['id']  .' '. 'class=hidden>';
                    echo '<input type=text name=title value="Update Title"><br>';
                    echo '<textarea name=post rows=10 cols=30>Update Post</textarea><br>';
                    echo '<button class=update>Update</button>';
                    echo '</form>';
                    echo '</article>';
                }
            ?>
           
            </section>
            <script type='text/javascript' src="../js/jquery-1.11.3.js"></script>
            <script type='text/javascript' src="../js/main.js"></script>
        </body>
        
    </html>