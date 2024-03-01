  <?php
    session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="writePost.js"></script>
  <title>Welcome</title>
</head>

<body>
  <header class="flex justify-between align-center bg-slate-50 py-4 px-4">
    <h2 class="p-0"><?php echo $_SESSION['fname'];?></h2>
    
    <div>
      <form action="dashboard.php" method="POST">
        <input type="submit" name="logout" value="Logout" class="bg-green-200 p-2 hover:bg-green-100 cursor-pointer"/>
      </form>
    </div>
  </header>
  <section 
    id="write-post-section"
    class="flex flex-col justify-center mt-10 max-w-96 mx-auto">
    <button 
      id="write-post-btn"
      class="bg-green-300 p-3 hover:bg-green-100 cursor-pointer text-lg mb-3"
      onclick="showPostModal()">
      Write a post
    </button>
    
    <form id="write-post-form" class="hidden flex flex-col justify-between" method="POST" action="insert_new_post.php">
      <div class="">
        <textarea 
          placeholder="Write a new post..."
          name="post_text"
          required
          class="border border-1 p-2 text-lg w-full min-h-32 focus:outline-none focus:border-green-500"></textarea>
      </div>
      <div class="flex justify-end">
        <input
          type="submit"
          value="Post"
          class="bg-green-300 p-3 hover:bg-green-100 cursor-pointer text-lg mb-3"/>
      </div>
    </form>
  </section>
  
  <main >
    <?php include 'get_posts.php';?>
  </main>

  <?php
    if(isset($_POST['logout'])){
      session_destroy();
      header("Location: login.php");
    }
  ?>
</body>
</html>