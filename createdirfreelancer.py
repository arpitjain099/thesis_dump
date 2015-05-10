import os
import sys
if not os.path.exists('freelancerdir/'+str(sys.argv[1])):
    os.makedirs('freelancerdir/'+sys.argv[1],0777)
    #print('freelancerdir/'+sys.argv[1]+'/uploads')
    os.makedirs('freelancerdir/'+sys.argv[1]+'/uploads',0777)