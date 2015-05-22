import csv
import sys
from pymongo import MongoClient
client = MongoClient()
db=client.thesisdb
import time
from time import gmtime, strftime
collection=db.tasks
username=sys.argv[2]
collection_rec=db.recruiter
count= collection_rec.find_one({"username":username})['count']
with open(sys.argv[1], 'rb') as csvfile:
	spamreader = csv.reader(csvfile)
	for index,row in enumerate(spamreader):
		if index > 11 and row[0]>'0' and row[0]<'7':
			count=count+1
			if row[0]=='1':
				post={"question":row[2],"taskid":username+'_'+str(count),"username":username,"imgurl":row[1],"textcontent":"","mp3url":"","img1":"","img2":"","heading":"","summary":"","tasksymbol":1,"dateofadding":str(int(time.time())),"time":(len(row[2].split())/5+5),"price":int(row[3])}
				collection.insert(post)
			elif row[0]=='2':
				post={"question":row[3],"taskid":username+'_'+str(count),"username":username,"imgurl":"","textcontent":"","mp3url":"","img1":row[1],"img2":row[2],"heading":"","summary":"","tasksymbol":2,"dateofadding":str(int(time.time())),"time":(len(row[3].split())/5+3+3+3),"price":int(row[4])}
				collection.insert(post)
			elif row[0]=='3':
				post={"question":row[4],"taskid":username+'_'+str(count),"username":username,"imgurl":"","textcontent":"","mp3url":"","img1":row[1],"img2":row[2],"heading":"","summary":row[3],"tasksymbol":3,
				"dateofadding":str(int(time.time())),
				"time":((len(row[4].split())/5)+3+3+3),
				"price":int(row[5])}
				collection.insert(post)
			elif row[0]=='4':				
				post={"question":row[2],"taskid":username+'_'+str(count),"username":username,"imgurl":"","textcontent":row[1],"mp3url":"","img1":"","img2":"","heading":"","summary":"","tasksymbol":4,"dateofadding":str(int(time.time())),"time":(len(row[2].split())/5+len(row[1].split())/5 + 3),"price":int(row[3])}
				collection.insert(post)
			elif row[0]=='5':
				
				post={"question":row[3],"taskid":username+'_'+str(count),"username":username,"imgurl":"","textcontent":"","mp3url":"","img1":"","img2":"","heading":row[1],"summary":row[2],"tasksymbol":5,"dateofadding":str(int(time.time())),"time":(len(row[3].split())/5+len(row[1].split())/5 + len(row[2].split())/5 +  3),"price":int(row[4])}
				collection.insert(post)
			elif row[0]=='6':
				
				post={"question":row[3],"taskid":username+'_'+str(count),"username":username,"imgurl":"","textcontent":"","mp3url":row[1],"img1":"","":"","heading":"","summary":"","tasksymbol":6,"dateofadding":str(int(time.time())),"time":int(row[2])+5+len(row[3].split())/5,"price":int(row[4])}
				collection.insert(post)
			post = collection_rec.find_one({"username":username})
			post["count"]=count
			collection_rec.save(post)