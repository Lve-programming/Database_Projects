<?php
    include('includes/layout/header.php');
?>
<main>
    <div name="container" class="container">
  <div class="login-card">
    <div class="login-card-header">
      <h2>ورود به حساب </h2>
    </div>
    <div class="login-card-body">
      <form action="includes/login.php" method="post" >
        <div class="form-group">
          <label for="username">نام کاربری ،ایمیل یا شماره موبایل:</label>
          <input type="text" id="key" name="key" required>
        </div>
        <div class="form-group">
          <label for="password">گذرواژه:</label>
          <input type="password" id="password" name="password" >
        </div>
        <?php
          if (isset($_GET['empty'])) {
            ?>
            <p class ="alert alert-danger" >فیلد ها نمیتوانند خالی باشند</p>
        <?php    
          }
        ?>
        <?php
          if (isset($_GET['nouser'])) {
            ?>
            <p class ="alert alert-danger" >کاربری با این مشخصات یافت نشد</p>
        <?php    
          }
        ?><?php
        if (isset($_GET['hasuser'])) {
          
          ?>
          <p class ="alert alert-success" >با موفقیت وارد حساب شدید</p>
      <?php
        }
      ?>
        <button type="submit" class="login-btn">ورود</button>
        <p><a href="register-form.php"  class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">حساب ندارید؟ یکی بسازید</a></p>
        <?php

        ?>
      </form>
    </div>
  </div>
</div>
<?php
    include('includes/layout/footer.php');
?>
<style>


div[name=container] {
  width: 100%;
  max-width: 400px;
  padding: 20px;
  box-sizing: border-box;
}

.login-card {
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 5px;
  overflow: hidden;
}

.login-card-header {
  background-color: #3498db;
  color: #fff;
  text-align: center;
  padding: 15px;
}

.login-card-body {
  padding: 20px;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  color: #333;
}

input {
  width: 100%;
  padding: 8px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.login-btn {
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  background-color: #3498db;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

.login-btn:hover {
  background-color: #2980b9;
}
</style>
</main>
