using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Confirmation : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        orderPriceLabel.Text = ((int)Session["order_price"]).ToString();
        Session["orders"] = null;
        Session["prices"] = null;
        Session["order_price"] = null;
    }
}