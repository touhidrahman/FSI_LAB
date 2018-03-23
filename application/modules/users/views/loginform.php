
<!--       <form class="form-signin" role="form"> -->
      <?php 
      $attr = array('class' => 'form-signin', 'role' => 'form');
      echo form_open('users/submit', $attr);
      ?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <select name="username" class="form-control">
            <option value="Deo">Operator</option>
            <option value="Teacher">Teacher</option>
            <option value="Admin">Admin</option>
        </select>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <?php echo form_close();
        br(6);
      ?>

<p>Application Developed by:<br>
<a href="mailto:tanimkg@gmail.com">Flight Lieutenant S M Touhidur Rahman</a><br>
&copy; 2014</p>

