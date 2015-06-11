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
		if index > 0:
			count=count+1
			time_assign=0
			if row[2]!="":
				time_assign=time_assign+3
			if row[3]!="":
				time_assign=time_assign+3
			time_assign=time_assign+(len(row[0].split()) + len(row[4].split()) + len(row[5].split()) + len(row[6].split()) + len(row[8].split())+ len(row[9].split()) )/5
				
			post={
				"question":row[0],#
				"price":int(row[1]),#
				"img1url":row[2],#
				"img2url":row[3],#
				"heading":row[4],#
				"context":row[5],#
				"title":row[6],#
				"photo_upload_on":row[7],#
				"text1":row[8],#
				"text2":row[9],#
				"gps_coordinate":row[10],##
				"taskid":username+'_'+str(count),	#	
				"dateofadding":str(int(time.time())),#
				"time":time_assign,#
				}
			collection.insert(post)
		post = collection_rec.find_one({"username":username})
		post["count"]=count
		collection_rec.save(post)