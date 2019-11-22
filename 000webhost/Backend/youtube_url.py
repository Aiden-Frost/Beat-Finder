import urllib.request
from bs4 import BeautifulSoup

def search(song):
    textToSearch = song
    query = urllib.parse.quote(textToSearch)
    url = "https://www.youtube.com/results?search_query=" + query
    response = urllib.request.urlopen(url)
    html = response.read()
    soup = BeautifulSoup(html, 'html.parser')
    for vid in soup.findAll(attrs={'class':'yt-uix-tile-link'}):
        try:
            link = (vid['href'].split("v=")[1])
        except IndexError:
            return 0
        else:
            return link
