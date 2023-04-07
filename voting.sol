// SPDX-License-Identifier: GPL-3.0

pragma solidity ^0.8.0;

contract Voting {
    struct Candidate {
        string name;
        string party;
        bool registered;
        address candidateAddress;
        uint256 votes;
    }

    struct Voter {
        string name;
        string voterno;
        string adharno;
        bool registered;
        address voterAddress;
        bool voted;
    }

    enum PHASE {
        reg,
        regdone,
        voting,
        votingdone
    }

    uint256 count1 = 1; //candidate count
    uint256 count2 = 1; //voter count
    uint256 count3 = 1; //winners count

    string public eventName;
    uint256 public totalVote;
    address public admin;
    string[] public winnerparty;
    bool votingStarted;

    event success(string msg);
    Candidate[] public candidateList;
        Candidate[] public displaycandidateList;

    Voter[] public voters;
        Voter[] public displayvoters;

    mapping(uint256 => address) public candidates2;
    mapping(address => uint256) public candidates1;
    mapping(address => uint256) public voterList;
    address[] addressofcan;
        address[] addressofvoter;


    PHASE public state;

    constructor(string memory _eventName) {
        admin = msg.sender;
        state = PHASE.reg;
        eventName = _eventName;
        totalVote = 0;
        votingStarted = false;
    }

    modifier onlyAdmin() {
        require(msg.sender == admin, "Only Admin is allowed to do this");
        _;
    }

    modifier onlyVoter() {
        require(msg.sender != admin, "Admin is not allowed to do this");
        _;
    }

    modifier notAdmin() {
        require(msg.sender!=admin, "Admin is not allowed to do this");
        _;
    }

    modifier validState(PHASE x) {
        require(state == x);
        _;
    }

    function registerCandidate(
        string memory _name,
        string memory _party
    ) public notAdmin validState(PHASE.reg) {
        address _candidateAddress=msg.sender;
        require(_candidateAddress != admin, "Owner can not participate!!");
        require(
            candidates1[_candidateAddress] == 0,
            "Candidate already registered"
        );

        Candidate memory candidate = Candidate({
            name: _name,
            party: _party,
            registered: true,
            votes: 0,
            candidateAddress: _candidateAddress
        });
        if (candidateList.length == 0) {
            candidateList.push();
        }
        candidates1[_candidateAddress] = candidateList.length;
        candidates2[count1] = _candidateAddress;
                addressofcan.push(candidates2[count1]);

        count1++;
        candidateList.push(candidate);
        displaycandidateList.push(candidate);
        emit success("Candidate registered!!");
    }
}