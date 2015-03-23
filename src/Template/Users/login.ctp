<?php echo $this->assign('title', 'Members Login');?>
<?php echo $this->assign('pageTitle', 'Please Sign In');?>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 social-login">
                <p>
                    Not a member yet?<br /><br />
                    <?php
                    echo $this->Html->link('Register as Jobseeker', ['controller' => 'Jobseekers', 'action' => 'register'],
                        ['class' => 'btn btn-lg'])
                    ?>
                    <br /><br />OR<br /><br />
                    <?php
                    echo $this->Html->link('Register as Employer', ['controller' => 'Employers', 'action' => 'register'],
                        ['class' => 'btn btn-lg'])
                    ?>
                </p>
            </div>
            <div class="col-sm-7">
                <div class="basic-login">
                    <?php echo $this->Form->create() ?>
                    <div class="form-group">
                        <label for="login-username"><i class="icon-user"></i> <b>Email Address</b></label>
                        <input class="form-control" id="login-username" name="email" type="text" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="login-password"><i class="icon-lock"></i> <b>Password</b></label>
                        <input class="form-control" id="login-password" name="password" type="password" placeholder="">
                    </div>
                    <div class="form-group">
                        <?php echo $this->Html->link('Forgotten your password?', [
                            'controller' => 'Users', 'action' => 'forgot_password'
                        ])?>
                        <button type="submit" class="btn pull-right">Login</button>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->Form->end()?>
                </div>
            </div>
        </div>
    </div>
</div>