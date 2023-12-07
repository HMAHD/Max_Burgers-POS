<style>
  .user-profile {
    background: linear-gradient(135deg, #ff4e50, #f9d423);
    padding: 8px;
    margin: 15px 0;
    border-radius: 15px;
    text-align: left;
    transition: transform 0.2s;
  }

  .user-profile a {
    text-decoration: none;
    color: transparent;
    -webkit-background-clip: text;
    background-clip: text;
  }

  .user-profile:hover {
    transform: scale(1.05);
  }

  .user-profile-text {
    font-weight: bold;
    opacity: 0.7;
    margin: 12px 0;
  }

  .user-icon {
    font-size: 160%;
    line-height: 40px;
    border-radius: 50%;
    background: #ffffff;
    color: #ff4e50;
    padding: 10px;
    width: 60px;
    height: 60px;
  }

  .power-icon {
    font-size: 130%;
    line-height: 60px;
    color: #ff4e50;
  }
</style>

<div class="col-12 p-1">
  <a href="/pos/Account/Logout">
    <div class="user-profile">
      <div class="float-left mr-3 text-center">
        <div class="user-icon">
          <i class="fa fa-user-circle-o" aria-hidden="true"></i>
        </div>
      </div>
      <div class="float-left">
        <p class="user-profile-text cl">Max Burgers</p>
        <p class="user-profile-text cl" style="font-size: 80%; opacity: 0.7">Administrator</p>
      </div>
      <div class=" float-right text-center">
        <i class="fa fa-power-off power-icon" aria-hidden="true"></i>
      </div>
    </div>
  </a>
</div>