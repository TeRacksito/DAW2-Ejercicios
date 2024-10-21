from functools import reduce
from pprint import pprint
import json

data = """L	0	111011111000100
L	1	111001011110011
L	2	111110110101010
L	3	111100010011101
L	4	110011000101111
L	5	110001100011000
L	6	110110001000001
L	7	110100101110110
M	0	101010000010010
M	1	101000100100101
M	2	101111001111100
M	3	101101101001011
M	4	100010111111001
M	5	100000011001110
M	6	100111110010111
M	7	100101010100000
Q	0	011010101011111
Q	1	011000001101000
Q	2	011111100110001
Q	3	011101000000110
Q	4	010010010110100
Q	5	010000110000011
Q	6	010111011011010
Q	7	010101111101101
H	0	001011010001001
H	1	001001110111110
H	2	001110011100111
H	3	001100111010000
H	4	000011101100010
H	5	000001001010101
H	6	000110100001100
H	7	000100000111011"""

data = data.split("\n")
data = list(map(lambda level: list(
    filter(lambda e: e, level.split("\t"))), data))
result = reduce(lambda acc, level_data:
                {**acc, level_data[0]:
                 {**acc.get(level_data[0], {}), level_data[1]: level_data[2]}},
                data,
                {})

# Save data as JSON file
with open('/var/www/html/ejercicios/DSW/3/projects/qr-generator/src/data.json', 'w') as json_file:
    json.dump(result, json_file, indent=4)
