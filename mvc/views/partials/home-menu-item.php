<style>
    .menu-item {
        background: linear-gradient(135deg, #ff4e50, #f9d423);
        padding: 10px 20px;
        /* Added padding for space */
        margin: 5px 0;
        /* Added margin for space between items */
        border-radius: 5px;
        /* Rounded corners */
        text-align: left;
        /* Text left-aligned */
        transition: all 0.2s;
        /* Smooth hover effect */
    }

    .menu-item a {
        text-decoration: none;
        color: transparent;
        -webkit-background-clip: text;
        background-clip: text;
    }

    .menu-item:hover {
        transform: scale(1.05);
        /* Slight scale-up on hover */
    }

    .menu-text {
        font-weight: bold;
        font-size: 1.3rem;
        opacity: 0.7;
        display: inline-block;
        /* Display the text and icon inline */
        margin-right: 10px;
        /* Add some space between text and icon */
    }
</style>

<div class="col-12 p-1" style="height: 80px;">
    <a href="/pos/Analitics/Index/day">
        <div class="menu-item">
            <p class="menu-text cl">Orders</p>
            <i class="fa fa-anchor cl" aria-hidden="true" style="font-size: 1.5rem; opacity: 0.8; float: right;"></i>
        </div>
    </a>
</div>

<div class="col-12 p-1" style="height: 80px;">
    <a href="/pos/Product/ProductsDashboard">
        <div class="menu-item">
            <p class="menu-text cl">Product</p>
            <i class="fa fa-cutlery cl" aria-hidden="true" style="font-size: 1.5rem; opacity: 0.8; float: right;"></i>
        </div>
    </a>
</div>

<div class="col-12 p-1" style="height: 80px;">
    <a href="/pos/System/Index">
        <div class="menu-item">
            <p class="menu-text cl">System</p>
            <i class="fa fa-cogs cl" aria-hidden="true" style="font-size: 1.5rem; opacity: 0.8; float: right;"></i>
        </div>
    </a>
</div>

<div class="col-12 p-1" style="height: 80px;">
    <a href="/pos/Account/Index">
        <div class="menu-item">
            <p class="menu-text cl">Account</p>
            <i class="fa fa-key cl" aria-hidden="true" style="font-size: 1.5rem; opacity: 0.8; float: right;"></i>
        </div>
    </a>
</div>

<div class="col-12 p-1" style="height: 80px;">
    <a href="/pos/Analysis/Index">
        <div class="menu-item">
            <p class="menu-text cl">Analytics</p>
            <i class="fa fa-bar-chart cl" aria-hidden="true" style="font-size: 1.5rem; opacity: 0.8; float: right;"></i>
        </div>
    </a>
</div>