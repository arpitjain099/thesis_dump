import requests
import json
url="https://pizzaonline.dominos.co.in/redeemCoupon.php"
data= {
    'session_id': '5289c49e9011f3b78ad67e8be6113582',
    'coupon_code': 'MOB06'
    }

#print requests.get(url, data=data, cookies=cookies).text

headers = {
    "Host": "pizzaonline.dominos.co.in",
    "Connection": "keep-alive",
    "Content-Length": 61,
    "X-Requested-With":"XMLHttpRequest",
    "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    "Accept": "*/*",
    "Referer":"https://pizzaonline.dominos.co.in/menu.php",
    "Origin":"https://pizzaonline.dominos.co.in",
    "User-Agent":"Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.81 Safari/537.36",
    "Accept-Language":"en-US,en;q=0.8,ms;q=0.6",
    "Accept-Encoding":"gzip, deflate",
    "Cookie": "msuuid_1832kja11681=DA4404ED-C735-4A12-AE0D-A2328E9FD39F; _SPP=SPP.1335568594093.935; _SPS=SPS.729098443581.4636; __utma=246652549.1741784569.1433782698.1433782793.1433782793.1; __utmc=246652549; __utmz=246652549.1433782793.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); __atuvc=2%7C23; _iz_sd_ss_=%7B%22np%22%3A5%2C%22se%22%3A%222015-06-08T16%3A59%3A02.767Z%22%2C%22ru%22%3A%22https%3A%2F%2Fpizzaonline.dominos.co.in%2F%3Fsrc%3DMobikwik%22%2C%22ss%22%3Anull%7D; _iz_uh_ps_=%7B%22vi%22%3Anull%2C%22or%22%3A%22https%3A%2F%2Fpizzaonline.dominos.co.in%2F%3Fsrc%3DMobikwik%22%2C%22pv%22%3A1%2C%22lv%22%3A%222015-06-08T17%3A11%3A40.758Z%22%2C%22pr%22%3Anull%2C%22si%22%3A%5B%7B%22i%22%3A%22ixrdlkrf%22%2C%22c%22%3A-1%2C%22m%22%3Afalse%2C%22s%22%3A0%7D%5D%7D; _gat=1; __utmt=1; dc=2; session_id=5289c49e9011f3b78ad67e8be6113582; source=today-offers; _ga=GA1.3.1741784569.1433782698; __utma=146358305.1741784569.1433782698.1434822550.1434825231.3; __utmb=146358305.27.10.1434825231; __utmc=146358305; __utmz=146358305.1434825231.3.2.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided); __zlcmid=V8eiFlnSJF9lSE"
}
r = requests.post(url, data=json.dumps(data), headers=headers)
print(r.content)