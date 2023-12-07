<?php
class Analysis extends Controller
{
    public function Index()
    {
        $GetModel = $this->model("tbl_theme");
        $GetTheme = $GetModel->GetTheme();
        if (isset($_SESSION["username"])) {
            $this->view("master", ["Page" => "analysis", "GetTheme" => $GetTheme]);
        } else {
            header("Location: ../Account/Login");
        }
    }
    /*-
    public function analysis()
    {
        // Your logic for the analytics dashboard
        $this->view("analysis", ["Page" => "analysis"]);  // Adjust the view and parameters as needed
    }
*/
}
