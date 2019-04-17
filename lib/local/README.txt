The contents of lib/local should be copied to lib/local and then customised.
The recommended procedure is to do this under your own version control.

Each time you deploy a new version, lib/local will be overwritten by the master
version from github, but local will not. When you deploy your custom code,
your (custom) version of local will be used. You may or may not be able to
automate merging changes in the two. 
