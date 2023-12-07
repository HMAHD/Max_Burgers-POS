<?php

class HomeController extends Controller
{
    function Index()
    {
        $GetModel = $this->model("tbl_theme");
        $GetTheme = $GetModel->GetTheme();
        if (isset($_SESSION["username"])) {
            $GetFee = $this->model("tbl_fee");
            $GetFee = $GetFee->GetFee();
            $GetDiscount = $this->model("tbl_discount");
            $GetDiscount = $GetDiscount->GetDiscount();
            $this->view("master", ["Page" => "home", "fee" => $GetFee, "discount" => $GetDiscount, "GetTheme" => $GetTheme]);
        } else {
            header("Location: ./Account/Login");
        }
    }
    public function Analytics()
    {
        // Your logic for the analytics dashboard
        $this->view("analytics", ["Page" => "analytics"]); // Adjust the view and parameters as needed
    }
}
