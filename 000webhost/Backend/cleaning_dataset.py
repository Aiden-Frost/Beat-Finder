with open('music_data.csv') as input, open('final_data.csv', 'w') as output:
    non_blank = (line for line in input if line.strip())
    output.writelines(non_blank)
