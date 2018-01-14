using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Summary : System.Web.UI.Page
{
    Hashtable orders; // key to nazwa produktu; value to ilość produktów
    Hashtable prices; // key to nazwa produktu; value to cena produktu

    protected void Page_Load(object sender, EventArgs e)
    {
        orders = (Hashtable)Session["orders"];
        prices = (Hashtable)Session["prices"];

        if (prices != null && prices.Count != 0)
        {
            foreach (DictionaryEntry pair in prices)
            {
                order.Items.Add("produkt: " + pair.Key.ToString() + " cena: " + pair.Value.ToString() + " sztuk: " + orders[pair.Key].ToString());
            }
        } else
        {
            order.Items.Add("Koszyk jest pusty!");
        }
    }

}