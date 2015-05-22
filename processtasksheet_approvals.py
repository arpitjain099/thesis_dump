import csv
import sys
from pymongo import MongoClient
client = MongoClient()
db=client.thesisdb
import time
from time import gmtime, strftime
collection=db.tasks
#print db
username=sys.argv[2]

collection_rec=db.recruiter
#collection_rec.insert({"ada":"dada"})
#collection_rec.find_one({u'username':username})["count"]=11
#print collection_rec
listofusers=[]
with open(sys.argv[1], 'rb') as csvfile:
	#print sys.argv[1]
	spamreader = csv.reader(csvfile)
	#spamreader=spamreader[17:]
	for index,row in enumerate(spamreader):
		if index > 0:
			#14
			if row[9] not in listofusers:
				#print row[9].decode('unicode-escape')
				taa=row[9]
				taa=taa.replace("+AEA-","@")
				listofusers.append(taa)
tep=[]
for i in listofusers:
	lsa={}
	lsa[i]=0
	#print lsa
	tep.append(lsa)
#print tep
for index,i in enumerate(tep):
	print i['arpitjain099@gmail.com']
	
with open(sys.argv[1], 'rb') as csvfile:
	#print sys.argv[1]
	spamreader = csv.reader(csvfile)
	#spamreader=spamreader[17:]
	for index,row in enumerate(spamreader):
		#print row[1].split("_")[0]
		if index > 0 and sys.argv[2]==row[1].split("_")[0]:

			if row[14]=='Y' or row[14]=='y':
				
				taa=row[9]
				taa=taa.replace("+AEA-","@")
				for i in listofusers:
					if i==taa:
						
						

						#tep[i]=tep[I]+int(row[12])

print tep
		#	post={"question":question,"taskid":username+'_'+str(count),"username":username,"imgurl":row[1],"textcontent":"","mp3url":"","img1":"","img2":"","heading":"","summary":"","tasksymbol":1,"dateofadding":str(int(time.time())),"time":(len(question.split())/5+5),"price":int(row[3])}
				#print "fa"
		#	collection.insert(post)
				#collection.find_one()
		