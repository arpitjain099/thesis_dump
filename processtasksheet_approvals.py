import csv
import sys
from pymongo import MongoClient
client = MongoClient()
db=client.thesisdb
import time
from time import gmtime, strftime
collection=db.notifications
processedtasks=db.processedtasks
#print db
username=sys.argv[2]


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

				listofusers.append(row[9])
tep=[]

for i in listofusers:
	lsa={}
	lsa[i]=0
	#print lsa
	tep.append(lsa)

	
with open(sys.argv[1], 'rb') as csvfile:
	#print sys.argv[1]
	spamreader = csv.reader(csvfile)
	#spamreader=spamreader[17:]
	for index,row in enumerate(spamreader):
		#print row[1].split("_")[0]
		if index > 0 and sys.argv[2]==row[1].split("_")[0] and (row[15]=='Y' or row[15]=='y') :
			processedtasks.insert({"emailid":row[1],"taskid":row[9],"timestamp":str(int(time.time()))})
			for i in tep:
				taa=row[9]
				
				i[taa]=i[taa]+int(row[12])
						

						#tep[i]=tep[I]+int(row[12])
collection_users=db.users
for index,i in enumerate(tep):
	#print tep[index]
	for key, value in i.iteritems():
		post={"notif":"Rs. "+str(value)+" has been credited to your wallet","emailid":key,"timestamp":str(int(time.time()))}
		collection.insert(post)

		post2 = collection_users.find_one({"emailid":key})
		post2["wallet"]=post2["wallet"]+value
		collection_users.save(post2)
		if(post2["wallet"]>290):
			post2["level"]=29
			collection_users.save(post2)
		elif(post2["wallet"]>280):
			post2["level"]=28
			collection_users.save(post2)
		elif(post2["wallet"]>270):
			post2["level"]=27
			collection_users.save(post2)
		elif(post2["wallet"]>260):
			post2["level"]=26
			collection_users.save(post2)
		elif(post2["wallet"]>250):
			post2["level"]=25
			collection_users.save(post2)
		elif(post2["wallet"]>240):
			post2["level"]=24
			collection_users.save(post2)
		elif(post2["wallet"]>230):
			post2["level"]=23
			collection_users.save(post2)
		elif(post2["wallet"]>220):
			post2["level"]=22
			collection_users.save(post2)
		elif(post2["wallet"]>210):
			post2["level"]=21
			collection_users.save(post2)
		elif(post2["wallet"]>200):
			post2["level"]=20
			collection_users.save(post2)
		elif(post2["wallet"]>190):
			post2["level"]=19
			collection_users.save(post2)
		elif(post2["wallet"]>180):
			post2["level"]=18
			collection_users.save(post2)
		elif(post2["wallet"]>170):
			post2["level"]=17
			collection_users.save(post2)
		elif(post2["wallet"]>160):
			post2["level"]=16
			collection_users.save(post2)
		elif(post2["wallet"]>150):
			post2["level"]=15
			collection_users.save(post2)
		elif(post2["wallet"]>140):
			post2["level"]=14
			collection_users.save(post2)
		elif(post2["wallet"]>130):
			post2["level"]=13
			collection_users.save(post2)
		elif(post2["wallet"]>120):
			post2["level"]=12
			collection_users.save(post2)
		elif(post2["wallet"]>110):
			post2["level"]=11
			collection_users.save(post2)
		elif(post2["wallet"]>100):
			post2["level"]=10
			collection_users.save(post2)
		elif(post2["wallet"]>90):
			post2["level"]=9
			collection_users.save(post2)
		elif(post2["wallet"]>80):
			post2["level"]=8
			collection_users.save(post2)
		elif(post2["wallet"]>70):
			post2["level"]=7
			collection_users.save(post2)
		elif(post2["wallet"]>60):
			post2["level"]=6
			collection_users.save(post2)
		elif(post2["wallet"]>50):
			post2["level"]=5
			collection_users.save(post2)
		elif(post2["wallet"]>40):
			post2["level"]=4
			collection_users.save(post2)
		elif(post2["wallet"]>30):
			post2["level"]=3
			collection_users.save(post2)
		elif(post2["wallet"]>20):
			post2["level"]=2
			collection_users.save(post2)
		elif(post2["wallet"]>10):
			post2["level"]=1
			collection_users.save(post2)