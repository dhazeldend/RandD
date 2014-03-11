"""Fabric environment roles for Newspaper sites"""
from fabric.api import env, task
from fabric.contrib.console import confirm
from fabric.colors import white, red, yellow

# Global Role definitions
env.roledefs = {
    'cruise': [],
}

# Define available webapps - future proof roledefs that aren't webapps
env.webapps = ['dylan', 'richard']



# Environment with respective Role definitions
@task
def dev():
    """Dev environment"""
    env.environ = 'dev'
    env.root = {
        'cruise': '{}/'.format(env.base),
    }
