<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SlimJim Blog</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/slimjim.css" rel="stylesheet">
    </head>
        <body>
            <div class="container">

                    <header>
                        <h1 class="text-center"> The SlimJim Blog </h1>
                    </header>
                    <h2 class="text-center">Welcome to my Proof of Concept Blog</h2>
                    <p class="text-center">
                        This is a Slim Framework powered blog that is being used as a proof of concept, don't replace wordpress with it.
                    </p>

                    <section id="new_post">
                        <button id="new_post" class="toggle btn btn-success btn-lg" data-toggle="modal" data-target="#post_modal">New Post</button>
                          <div class="modal fade" id="post_modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class=modal-title">Add New Post</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" id="add_post">
                                            <input type="text" class="form-control" name="title" placeholder="New Title"><br>
                                            <textarea name="post" class="form-control" rows=10 cols=30 placeholder="New Post"></textarea><br>
                                            <input class="btn"type="submit" value="Post" />
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<form class="sj_hidden form-horizontal" id="add_post">
                            <input type="text" class="form-control name="title" placeholder="New Title"><br>
                            <textarea name="post" class="form-control" rows=10 cols=30 placeholder="New Post"></textarea><br>
                            <input class="btn"type="submit" value="Post" />
                        </form>-->
                    </section>


            <section id="posts">

            <?php
                foreach ($this->data['articles'] as $post){
                    echo '<article id='. $post['id'] . '>';
                    echo '<h3>' . $post['title'] . '</h3>';
                    echo '<p>' . $post['article'] . '</p>';
                    echo '<button class="delete btn btn-xs btn-danger">Delete</button>';
                    echo '<button class="toggle edit btn btn-xs btn-primary">Edit</button>';
                    echo '<form class="sj_hidden update">';
                    echo '<input type=text class="form-control" name=title placeholder="Update Title"><br>';
                    echo '<textarea name=post class="form-control" rows=10 cols=30 placeholder="Update Post"></textarea><br>';
                    echo '<input type="submit" value="Update">';
                    echo '</form>';
                    echo '</article>';
                }
            ?>

            </section>
            </div>

            <script type='text/javascript' src="../js/jquery-1.11.3.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script type='text/javascript' src="../js/main.js"></script>
        </body>

    </html>
