"""Fabric DevOps for News Webapps"""
from fabric.api import env, sudo, task
from fablib import adduser, addkey, invoke, targets
from os.path import abspath, dirname
import inspect
import os

# Import tasks from other modules
import deploy, apply


# Change to root directory of project
env.project_dir = dirname(abspath(dirname(
    inspect.getfile(inspect.currentframe()))))
os.chdir(env.project_dir)

# Global
env.always_use_pty = False

# Basic definitions
env.base = '/apps/cruise_app'
env.remote_user = 'ubuntu'

# Global tasks below
