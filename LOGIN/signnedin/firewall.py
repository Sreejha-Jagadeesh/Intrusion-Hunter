import subprocess

def enable_firewall():
    subprocess.run(['iptables', '--flush'])
    subprocess.run(['iptables', '--delete-chain'])

    subprocess.run(['iptables', '--policy', 'INPUT', 'DROP'])
    subprocess.run(['iptables', '--policy', 'FORWARD', 'DROP'])
    subprocess.run(['iptables', '--policy', 'OUTPUT', 'ACCEPT'])

    subprocess.run(['iptables', '-A', 'INPUT', '-i', 'lo', '-j', 'ACCEPT'])
    subprocess.run(['iptables', '-A', 'OUTPUT', '-o', 'lo', '-j', 'ACCEPT'])

    subprocess.run(['iptables', '-A', 'INPUT', '-m', 'conntrack', '--ctstate', 'ESTABLISHED,RELATED', '-j', 'ACCEPT'])

    allowed_ports = ['80', '443', '22']  

    for port in allowed_ports:
        subprocess.run(['iptables', '-A', 'INPUT', '-p', 'tcp', '--dport', port, '-j', 'ACCEPT'])

   
    subprocess.run(['iptables', '-A', 'INPUT', '-j', 'DROP'])

    print('Firewall enabled.')

def disable_firewall():

    subprocess.run(['iptables', '--flush'])
    subprocess.run(['iptables', '--delete-chain'])

   
    subprocess.run(['iptables', '--policy', 'INPUT', 'ACCEPT'])
    subprocess.run(['iptables', '--policy', 'FORWARD', 'ACCEPT'])
    subprocess.run(['iptables', '--policy', 'OUTPUT', 'ACCEPT'])

    print('Firewall disabled.')

enable_firewall()
