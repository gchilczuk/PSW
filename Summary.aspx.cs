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
    Hashtable receipt; //key to sposób dostawy; value to cena dostawy    
    List<string> names;

    protected void Page_Load(object sender, EventArgs e)
    {        
        orders = (Hashtable)Session["orders"];
        prices = (Hashtable)Session["prices"];        

        PrepareReceipt();
        if (!IsPostBack)
        {           
            if (prices != null && prices.Count != 0)
            {
                Session["names"] = new List<string>(prices.Count);
                names = (List<string>)Session["names"];
                foreach (DictionaryEntry pair in prices)
                {
                    order.Items.Add(String.Format("produkt: {0,-20} cena: {1,-4} zł sztuk: {2,-3}", pair.Key, pair.Value, orders[pair.Key]));
                    names.Add(pair.Key.ToString());             
                }                 
            }
            else
            {
                order.Items.Add("Koszyk jest pusty!");
            }
            SetReceiptList();
            productsPriceLabel.Text = GetProductsPrice().ToString() + " zł";
            orderPriceLabel.Text = GetProductsPrice().ToString() + " zł";
        }
        names = (List<string>)Session["names"];
        if (receiptRbList.SelectedItem != null)
        {
            Session["order_price"] = GetOrderPrice();
            orderPriceLabel.Text = Session["order_price"] + " zł";
        }
    }

    protected int GetProductsPrice()
    {
        int price = 0;
        string product_name;
        foreach (DictionaryEntry pair in prices)
        {
            product_name = pair.Key.ToString();
            price += (int)orders[product_name] * (int)prices[product_name];
        }
        return price;
    }    

    private void PrepareReceipt()
    {
        receipt = new Hashtable();
        receipt.Add("Kurier", 13);
        receipt.Add("Poczta", 7);
        receipt.Add("Osobiscie", 0);       
    }   

    private void SetReceiptList()
    {        
        receiptRbList.DataSource = receipt.Keys;
        receiptRbList.DataBind();                   
    }

    private int GetOrderPrice()
    {
        int price = GetProductsPrice();               
        if(receiptRbList.SelectedItem != null)
        {
            price += (int)receipt[receiptRbList.SelectedItem.ToString()];            
        }
        return price;
    }

    protected void clearButton_Click(object sender, EventArgs e)
    {
        ((Hashtable)Session["orders"]).Clear();
        ((Hashtable)Session["prices"]).Clear();
        names.Clear();
        order.Items.Clear();
        productsPriceLabel.Text = GetProductsPrice().ToString() + " zł";
        orderPriceLabel.Text = GetProductsPrice().ToString() + " zł";
    }

    protected void clearItem_Click(object sender, EventArgs e)
    {
        if(order.SelectedItem != null)
        {
            int index = order.SelectedIndex;
            if((int)orders[names[index]] > 1)
            {
                orders[names[index]] = (int)orders[names[index]] - 1;
                order.Items.RemoveAt(index);
                order.Items.Insert(index, String.Format("produkt: {0,-20} cena: {1,-4} zł sztuk: {2,-3}", names[index].ToString(), prices[names[index]].ToString(), orders[names[index]].ToString()));
            }
            else
            {
                prices.Remove(names[index]);
                orders.Remove(names[index]);
                order.Items.RemoveAt(index);
                names.RemoveAt(index);
            }                       
            productsPriceLabel.Text = GetProductsPrice().ToString() + " zł";
            orderPriceLabel.Text = GetProductsPrice().ToString() + " zł";
        }
    }

    protected void addItem_Click(object sender, EventArgs e)
    {
        if (order.SelectedItem != null)
        {
            int index = order.SelectedIndex;
            orders[names[index]] = (int)orders[names[index]] + 1;
            order.Items.RemoveAt(index);
            order.Items.Insert(index, "produkt: " + names[index].ToString() + " cena: " + prices[names[index]].ToString() + " zł sztuk: " + orders[names[index]].ToString());
                        
            productsPriceLabel.Text = GetProductsPrice().ToString() + " zł";
            orderPriceLabel.Text = GetProductsPrice().ToString() + " zł";
        }
    }
}