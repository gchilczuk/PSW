
using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Sklep : System.Web.UI.Page
{

    Hashtable products;
    Hashtable chbLists;

    Hashtable orders; // key to nazwa produktu; value to ilość produktów
    Hashtable prices; // key to nazwa produktu; value to cena produktu
    String current;



    protected void Page_Load(object sender, EventArgs e)
    {
        prepareProducts();
        if (!IsPostBack)
        {
            if (Session["orders"] == null)
            {
                Session["orders"] = new Hashtable();
                Session["prices"] = new Hashtable();
            }
            SetCategoriesList();
            SetProductsList("fruits");
            SetProductsList("wegetables");
            SetProductsList("others");
        }
        orders = (Hashtable)Session["orders"];
        prices = (Hashtable)Session["prices"];
        number_of_products.Text = countProducts().ToString();

        if (category_list.SelectedItem != null)
        {
            current = category_list.SelectedValue.ToString();
            
            foreach (DictionaryEntry pair in chbLists)
            {
                ((CheckBoxList)pair.Value).Visible = false;
            }
            ((CheckBoxList)chbLists[current]).Visible = true;
        }

        if (current != null)
        {
            buy_button.Visible = true;
        }
        else
        {
            buy_button.Visible = false;
        }
    }

    private void prepareProducts()
    {
        products = new Hashtable();
        chbLists = new Hashtable();
        Hashtable fruits = new Hashtable();
        Hashtable wegetables = new Hashtable();
        Hashtable others = new Hashtable();

        fruits.Add("banan", 2);
        fruits.Add("kiwi", 5);

        wegetables.Add("burak", 4);
        wegetables.Add("por", 5);

        others.Add("wałek", 12);
        others.Add("foremki", 20);

        products.Add("fruits", fruits);
        products.Add("wegetables", wegetables);
        products.Add("others", others);

        chbLists.Add("fruits", fruits_list);
        chbLists.Add("wegetables", wegetables_list);
        chbLists.Add("others", others_list);

    }

    private void SetCategoriesList()
    {
        category_list.DataSource = products.Keys;
        category_list.DataBind();
        category_list.DataTextField = "categoryID";
        category_list.DataValueField = "categoryValue";
    }

    protected int countProducts()
    {
        int n = 0;
        foreach (DictionaryEntry pair in orders)
            { n += (int)pair.Value; }
        return n;
    }

    private void SetProductsList(String name)
    {
        Hashtable htable = (Hashtable)products[name];
        CheckBoxList chb_list = (CheckBoxList)chbLists[name];
        foreach (DictionaryEntry pair in htable)
        {
            chb_list.Items.Add(pair.Key.ToString());
        }

        chb_list.Visible = false;

        foreach (ListItem item in chb_list.Items)
        {
            String key = item.Value;
            item.Text = key + " " + htable[key];
            item.Value = key;
        }
    }

    protected void Buy_button_Click(object sender, EventArgs e)
    {
        foreach (ListItem item in ((CheckBoxList)chbLists[current]).Items)
        {
            if (item.Selected)
            {
                prices[item.Value] = (int)((Hashtable)products[current])[item.Value];

                if (orders.ContainsKey(item.Value))
                {
                    orders[item.Value] = (int)orders[item.Value] + 1;
                }
                else
                {
                    orders[item.Value] = 1;
                }

                number_of_products.Text = countProducts().ToString();
            }
        }
    }

    protected void clear_Click(object sender, EventArgs e)
    {
        Session["orders"] = new Hashtable();
        Session["prices"] = new Hashtable();
        orders = (Hashtable)Session["orders"];
        prices = (Hashtable)Session["prices"];
        number_of_products.Text = countProducts().ToString();
    }
}