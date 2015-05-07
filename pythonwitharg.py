#!/usr/bin/python

import sys
import os
print 'Number of arguments:', len(sys.argv), 'arguments.'
print sys.argv[1]
coursename=sys.argv[1]
#os.system("cordova create "+coursename+" com.example.hello "+coursename)
import shutil, errno

def copyDirectory(src, dest):
    try:
        shutil.copytree(src, dest)
    # Directories are the same
    except shutil.Error as e:
        print('Directory not copied. Error: %s' % e)
    # Any error saying that the directory doesn't exist
    except OSError as e:
        print('Directory not copied. Error: %s' % e)
copyDirectory("openfb","temp/openfb")