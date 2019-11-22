import re
import csv
import youtube_url

fr = open("songs_data.txt",encoding="UTF-8")
data = fr.readlines()
final_data = [["Song","Artist","Genre","Embed-link"]]
temp = []
for i in range(len(data)):
    str1 = ''.join(map(lambda c: '' if c in "0123456789.\n"  else c,data[i]))
    str1 = str1.lstrip()
    temp =re.split(chr(8211),str1)
    if i<166:
        temp.append("rock")
    elif i<332:
        temp.append("pop")
    elif i<498:
        temp.append("country")
    elif i<664:
        temp.append("blues")
    elif i<830:
        temp.append("edm")
    else:
        temp.append("indie")
    final_data.append(temp)
    link = youtube_url.search(str1)
    temp.append(link)
    print(i)
fr.close()
with open('music_data.csv', 'w') as fw:
    writer = csv.writer(fw)
    writer.writerows(final_data)
fw.close()

'''
import pandas as pd
df = pd.read_csv("music_data.csv")
df.head()
'''
