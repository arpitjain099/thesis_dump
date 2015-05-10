import os
import sys
if not os.path.exists('recruiterdir/'+str(sys.argv[1])):
    os.makedirs('recruiterdir/'+sys.argv[1],0777)
    #print('recruiterdir/'+sys.argv[1]+'/uploads')
    os.makedirs('recruiterdir/'+sys.argv[1]+'/uploads',0777)