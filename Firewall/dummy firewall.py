import ctypes
import os
import sys
import platform
#dummy firewall summa ;)
def add_firewall_rule(rule_name, port, action):
    # Check if the script is running on Windows
    if platform.system() != 'Windows':
        print("This script only works on Windows.")
        sys.exit(1)

    # Create the Windows Firewall COM object
    firewall = ctypes.windll.hnetcfg.FwMgr

    # Create a new firewall rule
    new_rule = ctypes.windll.hnetcfg.INetFwRule

    # Set the properties of the rule
    new_rule.Name = rule_name
    new_rule.ApplicationName = os.path.abspath(sys.executable)
    new_rule.Protocol = 6  # TCP
    new_rule.LocalPorts = str(port)
    new_rule.Action = action  # 'BLOCK' to block traffic, 'ALLOW' to allow

    # Create the Windows Firewall policy object
    firewall_policy = firewall.CreateObject(ctypes.c_int(1), ctypes.IID_INetFwPolicy2)

    # Add the rule to the policy
    firewall_policy.Rules.Add(new_rule)

    print(f"Firewall rule '{rule_name}' has been {action.lower()}ed for port {port}.")

if __name__ == "__main__":
    # Specify the rule name, port, and action ('BLOCK' or 'ALLOW')
    rule_name = "BlockHTTP"
    port = 80
    action = "BLOCK"  # Change to "ALLOW" if you want to allow traffic

    add_firewall_rule(rule_name, port, action)
